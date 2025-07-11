<?php

class JugadorTalla {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("
            SELECT jt.*, j.nombre_apellido 
            FROM jugadortalla jt
            INNER JOIN jugador j ON j.id_jugador = jt.id_jugador
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM jugadortalla WHERE id_jugador_talla = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($data) {
        $stmt = $this->db->prepare("
            INSERT INTO jugadortalla (id_jugador, talla_zapato, talla_short, talla_franelilla)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['id_jugador'],
            $data['talla_zapato'],
            $data['talla_short'],
            $data['talla_franelilla']
        ]);
    }

    public function actualizar($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE jugadortalla 
            SET id_jugador = ?, talla_zapato = ?, talla_short = ?, talla_franelilla = ?
            WHERE id_jugador_talla = ?
        ");
        return $stmt->execute([
            $data['id_jugador'],
            $data['talla_zapato'],
            $data['talla_short'],
            $data['talla_franelilla'],
            $id
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM jugadortalla WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function obtenerJugadores() {
        $stmt = $this->db->query("SELECT id_jugador, nombre_apellido FROM jugador");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
