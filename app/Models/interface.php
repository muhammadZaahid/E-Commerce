<?php
  interface Create{
    public function Create();
  }

  class AddCustomer implements Create{
    private $name;
    private $email;
    private $password;
 
    public function __construct($name,$password,$email){
      $this->name = $alas;
      $this->email = $email;
      $this->password = $password;
    }
 
    public function Create(){
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    }
  }
  class AddProduct implements Create{
    private $category;
    private $brand;
 
    public function __construct($category,$brand){
      $this->category = $category;
      $this->brand = $brand;
    }
 
    public function Create(){
      $brand=Brand::get();
        $category=Category::where('is_parent',1)->get();
        // return $category;
        return view('backend.product.create')->with('categories',$category)->with('brands',$brand);
    }
  }

  class AddCategory implements Create{
    private $parent_cats;
    
 
    public function __construct($parent_cats){
      $this->parent_cats = $parent_cats;      
    }
 
    public function Create(){
      $parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();
      return view('backend.category.create')->with('parent_cats',$parent_cats);
    }
  }

?>