<?php

	class contacts{
		private $contactName;
		private $email;
		private $phone;
		private $address;
		private $user_id;

		function __construct($db) {
			$this->db = $db;
		}
		function read($id) {
			$safae = "SELECT * FROM contact WHERE user_id = :id";
			$stmt = $this->db->prepare($safae);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			if ($result) {
				return $result;
			}
			else {
				return null ;
			}
		}
		function getContactById($id, $user_id) {
			$query = "SELECT * FROM contact WHERE user_id = :user_id AND id = :id";
			$stmt = $this->db->prepare($query);
			$stmt->bindParam(":user_id", $user_id);
			$stmt->bindParam(":id", $id);

			if($stmt->execute()) {
				return $stmt->fetch(PDO::FETCH_ASSOC);
			} else {
				return false;
			}
		}

		function create($contactName, $email, $phone, $address, $user_id) {
			$sql = "INSERT INTO contact SET contactName=:name, email=:email, phone=:phone, address=:address, user_id=:id";
			$stmt = $this->db->prepare($sql);

			$stmt->bindParam(":name", $contactName);
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":phone", $phone);
			$stmt->bindParam(":address", $address);
			$stmt->bindParam(":id", $user_id);

			$stmt->execute();

		}

		function delete($user_id, $id) {
			$sql = "DELETE FROM contact WHERE user_id = :user_id AND id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':id', $id);
			if ($stmt->execute()) {
				return true;
			}
			return false;
		}

		function update($id, $contactName, $email, $phone, $address, $user_id) {
			$sql = "UPDATE contact SET contactName=:name, email=:email, phone=:phone, address=:address WHERE user_id=$user_id AND id=$id";
			$stmt = $this->db->prepare($sql);

			$stmt->bindParam(":name", $contactName);
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":phone", $phone);
			$stmt->bindParam(":address", $address);

			$stmt->execute();
		}
	}
?>