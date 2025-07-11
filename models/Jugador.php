<?php

class Jugador {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("SELECT * FROM jugador");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM jugador WHERE id_jugador = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($data) {
        $stmt = $this->db->prepare("
            INSERT INTO jugador (cedula, nombre_apellido, direccion, goles_anotados, faltas_cometidas)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['cedula'],
            $data['nombre_apellido'],
            $data['direccion'],
            $data['goles_anotados'],
            $data['faltas_cometidas']
        ]);
    }

    public function actualizar($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE jugador 
            SET cedula = ?, nombre_apellido = ?, direccion = ?, goles_anotados = ?, faltas_cometidas = ?
            WHERE id_jugador = ?
        ");
        return $stmt->execute([
            $data['cedula'],
            $data['nombre_apellido'],
            $data['direccion'],
            $data['goles_anotados'],
            $data['faltas_cometidas'],
            $id
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM jugador WHERE id_jugador = ?");
        return $stmt->execute([$id]);
    }
}