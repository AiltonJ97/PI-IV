package com.AJ.Spring.Vacinas.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import com.AJ.Spring.Vacinas.entities.Vacina;

public interface VacinaRepository extends JpaRepository<Vacina, Long> {
}
