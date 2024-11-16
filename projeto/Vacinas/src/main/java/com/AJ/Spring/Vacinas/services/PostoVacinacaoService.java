package com.AJ.Spring.Vacinas.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.AJ.Spring.Vacinas.entities.PostoVacinacao;
import com.AJ.Spring.Vacinas.repositories.PostoVacinacaoRepository;

@Service
public class PostoVacinacaoService {

    @Autowired
    private PostoVacinacaoRepository postoVacinacaoRepository;

    public List<PostoVacinacao> getTodosPostos() {
        return postoVacinacaoRepository.findAll();
    }

    public PostoVacinacao salvarPosto(PostoVacinacao postoVacinacao) {
        return postoVacinacaoRepository.save(postoVacinacao);
    }
}
