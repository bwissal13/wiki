<?php
namespace App\Models;
use App\Model;
use PDO;
use PDOException;
class UserModel extends Model{
    
    public function vrfyemailAndName($email, $name)
    {
        try {
            // Assuming you are using PDO for database access
            $stmt = $this->connection->prepare("SELECT * FROM user WHERE email = :email AND name = :name");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
    
            // Fetch the user record
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Return the user record or false if not found
            return ($user) ? $user : false;
        } catch (PDOException $e) {
            // Handle database errors
            // Log the error, redirect the user, or display a friendly message
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
    // UserModel.php


    // ... (other methods and properties)

    public function getUserByEmail($email)
    {
        // Ensure $email is properly sanitized to prevent SQL injection
        $email = $this->sanitizeInput($email);

        // Assuming you are using PDO for database operations
        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch the user as an associative array
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    // Add a method for sanitizing input to prevent SQL injection
    private function sanitizeInput($input)
    {
        // Implement your sanitization logic here
        // This is a basic example, you should use prepared statements or a suitable ORM for better security
        return htmlspecialchars(strip_tags($input));
    }
    
}

