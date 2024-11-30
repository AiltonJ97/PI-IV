package com.AJ.Spring.Vacinas.repositories;

import com.AJ.Spring.Vacinas.entities.Vacina;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface VacinaRepository extends JpaRepository<Vacina, Long> {
}
