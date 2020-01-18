<?php

namespace App\Http\Controllers;

use App\Hotels\OurHotelsService;
use App\Http\Resources\HotelResource;
use App\Http\Requests\HotelsSearchRequest;

class HotelsSearchController extends Controller
{
    /**
     * @var OurHotelsService
     */
    private $hotelsService;

    /**
     * HotelsSearchController constructor.
     *
     * @param OurHotelsService $hotelsService
     */
    public function __construct(OurHotelsService $hotelsService)
    {
        $this->hotelsService = $hotelsService;
    }

    /**
     * @param HotelsSearchRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search(HotelsSearchRequest $request)
    {
        return HotelResource::collection($this->hotelsService->search(
            $request->input('from_date'),
            $request->input('to_date'),
            $request->input('city'),
            $request->input('adults_number')
        ));
    }
}
