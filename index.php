<?php
            include "pages/queries.php";
            $requestedMethod = $_SERVER['REQUEST_METHOD']; //ottengo il metodo richiesto.
            $page = isset($_POST['start']) ? $_POST['start'] : 0;
            $size = isset($_POST['length']) ? $_POST['length'] : 20;
            $order = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : "asc";
            // $search = isset($_POST['search']['value']) ? $_POST['search']['value'] : null;
            $totalElements = totalElements();
            $datas = array();

            if ($requestedMethod === "POST") {
                    // if($search == null) {
                        $datas['data'] = postRequest($page*$size, $size, $order);
                    // } else {
                        // $datas['data'] = postRequestSearch($page*$size, $size, $order, $search);
                    // }
                    $datas['recordsFiltered']=$totalElements;
                    $datas['recordsTotal']=$totalElements;
                    echo json_encode($datas);
            }else if($requestedMethod === "PUT"){
                    $inputData = json_decode(file_get_contents('php://input'));
                    putRequest($_GET['id'], $inputData["birth_date"], $inputData["first_name"], $inputData["last_name"], $inputData["gender"], $inputData["hire_date"]);
                    echo json_encode($inputData);    
            } else if ($requestedMethod === 'DELETE' && isset($_GET['id'])) {
                        deleteRequest($_GET['id']);
                    echo json_encode($datas);

                }
?>