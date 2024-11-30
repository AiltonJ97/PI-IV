package com.AJ.Spring.Vacinas.repositories;

import com.AJ.Spring.Vacinas.entities.PostoVacinacao;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PostoVacinacaoRepository extends JpaRepository<PostoVacinacao, Long> {
}
