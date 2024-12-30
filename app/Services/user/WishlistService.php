<?php

namespace App\Services\user;

use App\Repositories\user\WishlistRepository;

class WishlistService
{


    protected $wishlistRepository;

    public function __construct(WishlistRepository $wishlistRepository)
    {
        $this->wishlistRepository = $wishlistRepository;
    }




    public function createWishlist($course_id)
    {
    
        return $this->wishlistRepository->createWishlist($course_id);
    }

   /*


    public function updateLecture(array $data, $video = null,  $id)
    {

        return $this->lectureRepository->updateLecture($data,  $video, $id);

    }  */


}
