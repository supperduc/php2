<?php

namespace Vietanh\Mvcoop\Models;

use Vietanh\Mvcoop\Commons\Model;

class Categories extends Model
{
    public function getAllCategories()
    {
        try {
            $sql = "SELECT * FROM categories";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getByIDCategories($id)
    {
        try {
            $sql = "SELECT * FROM categories where id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function insertCategories($name)
    {
        try {
            $sql = "INSERT INTO categories (name) 
            VALUES (:name)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':name', $name);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function updateCategories($id, $name)
    {
        try {
            $sql = "UPDATE `categories` 
                    SET  name= :name
                    WHERE `id` = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function deleteByIDCategories($id)
    {
        try {
            $sql = "DELETE FROM categories WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
