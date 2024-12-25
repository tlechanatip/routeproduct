<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; //ใช้ของ inertia
use Inertia\Response;


class ProductController extends Controller
{

    private $products = [['id' => 1, 'name' => 'Laptop',
            'description' => 'High-performance laptop',
            'price' => 1500,
            'imageSRC'=> 'https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/surface-laptop-7th-edition-black-13-compare-render-copilot?scl=1'],
        ['id' => 2, 'name' => 'Smartphone',
            'description' => 'Latest smartphone with great features',
            'price' => 800,
            'imageSRC' => 'https://images-cdn.ubuy.ae/639d5f1d101e5259a564ac2e-etigood-mini-smartphone-unlocked-1gb-ram.jpg'],
        ['id' => 3, 'name' => 'Tablet',
            'description' => 'Portable tablet for everyday use',
            'price' => 500,
            'imageSRC' => 'https://aws-obg-image-lb-4.tcl.com/content/dam/brandsite/region/global/products/tablets/tcl-nxtpaper-14/id/1.png?t=1721272443153&w=800'],
        ['id' => 4, 'name' => 'Spaceship',
            'description' => 'Go to Mars with me :)',
            'price' => 9999999,
            'imageSRC' => 'https://t3.ftcdn.net/jpg/05/37/59/18/360_F_537591848_fmbEBkekUGKQZB48RlCSxH0YXdo8dHhW.jpg'],
        ['id' => 5, 'name' => 'Book',
            'description' => 'Light and easy to use',
            'price' => 5,
            'imageSRC' => 'https://media.istockphoto.com/id/157482029/th/%E0%B8%A3%E0%B8%B9%E0%B8%9B%E0%B8%96%E0%B9%88%E0%B8%B2%E0%B8%A2/%E0%B8%81%E0%B8%AD%E0%B8%87%E0%B8%AB%E0%B8%99%E0%B8%B1%E0%B8%87%E0%B8%AA%E0%B8%B7%E0%B8%AD.jpg?s=612x612&w=0&k=20&c=Sb10K3ajZqMDf-K5t8IVCw0ElgWaeimpyRvrW_VSx7w='],
        ['id' => 6, 'name' => 'Motorcycle',
            'description' => 'Yamaha Grand Filano Hybrid Connected 2024',
            'price' => 1000,
            'imageSRC' => 'https://storagetym.blob.core.windows.net/www2021/images/product-2021/commuter/model-year-2024/grand-filano-hybrid-connected-2024/yamaha-grand-filano-hybrid-connected-2024_555x460px.png?sfvrsn=6eef01a2_2'],
        ['id' => 7, 'name' => 'Car',
            'description' => 'Toyota Yaris 2022 Fast is life',
            'price' => 3999,
            'imageSRC' => 'https://toyotabuzz.com/img/upload/car/color/20200605091701_941302608.png'],
        ['id' => 8, 'name' => 'Bone',
            'description' => 'Dog like this so much',
            'price' => 1,
            'imageSRC' => 'https://animalarchaeology.com/wp-content/uploads/2020/10/screenshot-1-4.png?w=891'],
        ['id' => 9, 'name' => 'Bread',
            'description' => 'Fresh from the oven',
            'price' => 2,
            'imageSRC' => 'https://i5.walmartimages.com/asr/fd51f0c3-4eea-4ff1-8109-7770339b6d85.fdba2ce348744cde3840700f5e33f3d3.jpeg?odnHeight=768&odnWidth=768&odnBg=FFFFFF'],
        ['id' => 10, 'name' => 'ไข่เจียวปู',
            'description' => 'ไข่เจียวปูสุดแสนอร่อย',
            'price' => 100,
            'imageSRC' => 'https://patternpack.org/wp-content/uploads/2022/12/3-4.jpg'],
        ];


    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
        //ส่งข้อมูลรายการสินค้า $this->products ไปในรูปแบบ key-value pair
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $product = collect($this->products)->firstWhere('id', $id);

        if (!$product) {
            abort(404, 'Product not found');
        }
        return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
