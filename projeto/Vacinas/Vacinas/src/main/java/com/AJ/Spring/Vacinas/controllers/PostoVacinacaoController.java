package com.AJ.Spring.Vacinas.controllers;


import com.AJ.Spring.Vacinas.entities.PostoVacinacao;
import com.AJ.Spring.Vacinas.services.PostoVacinacaoService;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.beans.factory.annotation.Autowired;

import java.util.List;

@RestController
@RequestMapping("/postos")
public class PostoVacinacaoController {

    @Autowired
    private PostoVacinacaoService postoVacinacaoService;

    @GetMapping
    public List<PostoVacinacao> getTodosPostos() {
        return postoVacinacaoService.getTodosPostos();
    }

    @GetMapping(value = "/{id}")
    public ResponseEntity<PostoVacinacao> findById(@PathVariable Long id){
        PostoVacinacao obj = postoVacinacaoService.findById(id);
        return ResponseEntity.ok().body(obj);
    }

    @PostMapping
    public PostoVacinacao criarPosto(@RequestBody PostoVacinacao postoVacinacao) {
        return postoVacinacaoService.salvarPosto(postoVacinacao);
    }

    @DeleteMapping(value = "/{id}")
    public ResponseEntity<Void> delete(@PathVariable Long id){
        postoVacinacaoService.delete(id);
        return ResponseEntity.noContent().build();
    }

    @PutMapping(value = "/{id}")
    public ResponseEntity<PostoVacinacao> update(@PathVariable Long id, @RequestBody PostoVacinacao obj){
        obj = postoVacinacaoService.update(id, obj);
        return ResponseEntity.ok().body(obj);
    }
}
