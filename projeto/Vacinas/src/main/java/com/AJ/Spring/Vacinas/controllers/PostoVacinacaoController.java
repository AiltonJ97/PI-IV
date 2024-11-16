package com.AJ.Spring.Vacinas.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.AJ.Spring.Vacinas.entities.PostoVacinacao;
import com.AJ.Spring.Vacinas.services.PostoVacinacaoService;

@RestController
@RequestMapping("/postos")
public class PostoVacinacaoController {

    @Autowired
    private PostoVacinacaoService postoVacinacaoService;

    @GetMapping
    public List<PostoVacinacao> getTodosPostos() {
        return postoVacinacaoService.getTodosPostos();
    }

    @PostMapping
    public PostoVacinacao criarPosto(@RequestBody PostoVacinacao postoVacinacao) {
        return postoVacinacaoService.salvarPosto(postoVacinacao);
    }
}
