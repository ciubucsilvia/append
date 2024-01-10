<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Repositories\TestimonialRepository;

class TestimonialController extends AdminController
{
    protected $testimonialRepository;

    public function __construct()
    {
        parent::__construct();
        
        $this->title = 'Testimonial';
        $this->folder = 'testimonials';

        $this->testimonialRepository = app(TestimonialRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view testimonials')) abort('401');

        $this->title .= 's';

        $items = $this->testimonialRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.testimonials.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create testimonial')) abort('401');

        $this->title .= '::create';
        
        $this->content = view($this->theme . '.admin.testimonials.create');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        if(!$this->user->can('store testimonial')) abort(401);
        
        $data = $request->all();
        // create new object 
        $testimonial = $this->testimonialRepository->create($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->testimonialRepository->saveImage($testimonial, $file, $this->folder);
        }
        // save $data['active']
        $this->testimonialRepository->setActive($testimonial, $data);

        if($testimonial) {
            return redirect()
            ->route('admin.testimonials.index')
            ->with(['success' => 'Successfully saved!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        if(!$this->user->can('show testimonial')) abort(401);

        $this->content = view(env('THEME') . '.admin.testimonials.show', 
            compact('testimonial'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        if(!$this->user->can('edit testimonial')) abort(401);
        $this->title .= '::edit';
        $this->content = view(env('THEME') . '.admin.testimonials.edit', 
            compact('testimonial'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        if(!$this->user->can('update testimonial')) abort(401);
        $data = $request->all();
        
        $testimonial->update($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            
            $this->testimonialRepository->saveImage($testimonial, $file, $this->folder);
        }
        // save $data['active']
        $this->testimonialRepository->setActive($testimonial, $data);

        if($testimonial) {
            return redirect()
            ->route('admin.testimonials.index')
            ->with(['success' => "Testimonial: $testimonial->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        if(!$this->user->can('delete service')) abort(401);
        $testimonialName = $testimonial->name;

        $this->testimonialRepository->deleteImage($testimonial->image, $this->folder);
        $testimonial->delete();
        
        return redirect()
            ->route('admin.testimonials.index')
            ->with(['success' => "Testimonial: $testimonialName deleted!"]);
    }
}
