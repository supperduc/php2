<?php

namespace Vietanh\Mvcoop\Models;

use Vietanh\Mvcoop\Commons\Model;

class Post extends Model
{
    public function getAllPost()
    {
        try {
            $sql = "SELECT p.id , `title`, `excerpt`, `image`, c.name 
            FROM `post` p JOIN categories c ON p.category_id = c.id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getByIDPost($id)
    {
        try {
            $sql = "SELECT p.id , `title`, `content`, `excerpt`, `image`, c.name, `category_id` 
            FROM `post` p JOIN categories c ON p.category_id = c.id where p.id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function insertPost($title, $excerpt, $content, $image, $category_id)
    {
        try {
            $sql = "INSERT INTO 
                `post`(`title`, `excerpt`, `content`, `image`, `category_id`), 
                `post_galleries`(`post_id`, `image`)
            VALUES 
                (:title,:excerpt,:content,:image,:category_id),
                (:post_id,:image)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':category_id', $category_id);

            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function updatePost($id, $title, $excerpt, $content, $image, $category_id)
    {
        try {
            $sql = "UPDATE `post` 
                    SET title       = :title,
                        excerpt     = :excerpt,
                        content     = :content,
                        image       = :image,
                        category_id = :category_id
                    WHERE `id` = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':category_id', $category_id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function deleteByIDPost($id)
    {
        try {
            $sql = "DELETE FROM post WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getAHot()
    {
        try {
            $sql = "SELECT p.id , `title`, `content`, `excerpt`, `image`, c.name 
            FROM `post` p JOIN categories c ON p.category_id = c.id order by p.id desc limit 1";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getTop6()
    {
        try {
            $sql = "SELECT p.id , `title`, `excerpt`, `image`, c.name 
            FROM `post` p JOIN categories c ON p.category_id = c.id order by p.id desc limit 6";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
