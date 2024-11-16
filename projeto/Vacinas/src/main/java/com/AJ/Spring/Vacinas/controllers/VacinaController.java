package com.AJ.Spring.Vacinas.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.AJ.Spring.Vacinas.entities.Vacina;
import com.AJ.Spring.Vacinas.services.VacinaService;

@RestController
@RequestMapping("/vacinas")
public class VacinaController {

    @Autowired
    private VacinaService vacinaService;

    @GetMapping
    public List<Vacina> getVacinasDisponiveis() {
        return vacinaService.getVacinasDisponiveis();
    }

    @PostMapping
    public Vacina criarVacina(@RequestBody Vacina vacina) {
        return vacinaService.salvarVacina(vacina);
    }
}
