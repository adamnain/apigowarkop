<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

//rute GET /allmenu/
$app->get("/allmenu/", function (Request $request, Response $response){
    $sql = "SELECT * FROM makanan";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

//search menu
$app->get("/menu/search", function (Request $request, Response $response, $args){
    $keyword = $request->getQueryParam("keyword");
    $sql = "SELECT * FROM makanan WHERE nama LIKE '%$keyword%' OR kategori LIKE'%$keyword%'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

//rute GET /menu/1
$app->get("/menu/{id}", function (Request $request, Response $response, $args){
    $id = $args["id"];
    $sql = "SELECT * FROM makanan WHERE id=:id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":id" => $id]);
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});


//Rute POST /login
$app->post("/login/", function (Request $request, Response $response){

    $login = $request->getParsedBody();

    $sql = "SELECT nama,alamat,no_hp,email, api_key FROM pelanggan WHERE email=:email AND password=:password";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":email" => $login["email"],
        ":password" => $login["password"],
    ];

    $stmt->execute($data);
    $result = $stmt->fetch();


    if($result)
       return $response->withJson(["status" => "success", "data" => $result], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//Rute POST /register
$app->post("/register/", function (Request $request, Response $response){
    $register = $request->getParsedBody();

    $sql = "INSERT INTO pelanggan(nama, alamat, no_hp, email, password, api_key, hit) VALUES (:nama,:alamat, :no_hp,:email,:password, :api_key, :hit)";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":nama" => $register["nama"],
        ":alamat" => $register["alamat"],
        ":no_hp" => $register["no_hp"],
        ":email" => $register["email"],
        ":password" => $register["password"],
        ":api_key" => $register["api_key"],
        ":hit" => $register["hit"]
    ];


    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);

    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});



$app->post("/pesan/", function (Request $request, Response $response){

    $new_pesan = $request->getParsedBody();

    $sql = "INSERT INTO pesan(nama, no_hp, email, latit, longit, nama_menu, gambar, jumlah, total_harga, status) VALUES (:nama,:no_hp, :email,:latit,:longit, :nama_menu, :gambar, :jumlah, :total_harga, :status)";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":nama" => $new_pesan["nama"],
        ":no_hp" => $new_pesan["no_hp"],
        ":email" => $new_pesan["email"],
        ":latit" => $new_pesan["latit"],
        ":longit" => $new_pesan["longit"],
        ":nama_menu" => $new_pesan["nama_menu"],
        ":gambar" => $new_pesan["gambar"],
        ":jumlah" => $new_pesan["jumlah"],
        ":total_harga" => $new_pesan["total_harga"],
        ":status" => $new_pesan["status"]
    ];


    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);

    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//melihat semua pesanan
$app->get("/pesan/lihat", function (Request $request, Response $response){
    $sql = "SELECT * FROM pesan";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});


//melihat pesanan berdasarkan email
$app->get("/pesan/lihat/{email}", function (Request $request, Response $response, $args){
    $email = $args["email"];
    $sql = "SELECT * FROM pesan WHERE email= :email";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":email" => $email]);
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});


//update status pesanan
$app->put("/status/pesan/{id}", function (Request $request, Response $response, $args){
    $id = $args["id"];
    $ganti_status = $request->getParsedBody();
    $sql = "UPDATE pesan SET status=:status WHERE id=:id";
    $stmt = $this->db->prepare($sql);
    
    $data = [
        ":id" => $id,
        ":status" => $ganti_status["status"],
    ];
    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => $data], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//delete pesan by id
$app->delete("/pesan/{id}", function (Request $request, Response $response, $args){
    $id = $args["id"];
    $sql = "DELETE FROM pesan WHERE id=:id";
    $stmt = $this->db->prepare($sql);
    
    $data = [
        ":id" => $id
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});