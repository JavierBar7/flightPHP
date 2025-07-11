<?php

class Acceso {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("SELECT * FROM acceso");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM acceso WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($data) {
        $stmt = $this->db->prepare("
            INSERT INTO acceso (usuario, contrasena, rol)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([
            $data['usuario'],
            $data['contrasena'],
            $data['rol'] ?? 'usuario'
        ]);
    }

    public function login($data) {
        $stmt = $this->db->prepare("SELECT id, usuario, contrasena, rol FROM acceso WHERE usuario = ?");
        $stmt->execute([$data['usuario']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) { 
            return null;
        }
        
        if ($user['contrasena'] == $data['contrasena']) {
            return $user;
        } else {
            return null;
        }
    }

    public function actualizar($id, $data) {
        $sql = "UPDATE acceso SET usuario = ?, rol = ?";
        $params = [$data['usuario'], $data['rol']];

        if (!empty($data['contrasena'])) {
            $sql .= ", contrasena = ?";
            $params[] = password_hash($data['contrasena'], PASSWORD_BCRYPT);
        }

        $sql .= " WHERE id = ?";
        $params[] = $id;

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM acceso WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
