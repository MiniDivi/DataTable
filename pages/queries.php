<?php


function postRequest($start, $lenght, $order){
    require('connection.php');
    $query = "SELECT * FROM employees ORDER BY id $order LIMIT $first, $lenght";
    $result = $mysqli->query($query);
    $rows = array();
    while ($row= $result-> fetch_assoc()) {
        $rows[]=$row;
    }
    return $rows;
}

function putRequest($id, $birth_date, $first_name, $last_name, $gender, $hire_date){
    require('connection.php');
    $query = "UPDATE employees
            SET birth_date='$birth_date', first_name='$first_name', last_name='$last_name', gender='$gender', hire_date='$hire_date'
            WHERE employees.id=$id";
    $result = $mysqli->query($query);
}

function deleteRequest($id){
    require('connection.php');
    $query = "DELETE FROM employees
                WHERE employees.id=$id";
        $result = $mysqli->query($query);
    }

    function totalElements(){
        require('connection.php');
        $query = "SELECT COUNT(*)  FROM employees";
        $result = $mysqli->query($query);
        $row= $result-> fetch_array();
        return intval($row[0]);
    }
