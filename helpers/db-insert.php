<?php
function insertLead($conn, $table, $data)
{
    if (empty($table) || empty($data)) {
        return false;
    }

    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), "?"));

    $types = '';
    $values = [];

    foreach ($data as $value) {
        $types .= is_int($value) ? 'i' : 's';
        $values[] = $value;
    }

    $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";

    $stmt = $conn->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param($types, ...$values);
    $result = $stmt->execute();

    $stmt->close();

    return $result;
}