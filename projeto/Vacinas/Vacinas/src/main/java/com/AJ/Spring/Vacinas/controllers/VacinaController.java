package com.AJ.Spring.Vacinas.controllers;
import com.AJ.Spring.Vacinas.entities.Vacina;
import com.AJ.Spring.Vacinas.services.VacinaService;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.beans.factory.annotation.Autowired;

import java.util.List;

@RestController
@RequestMapping("/vacinas")
public class VacinaController {

    @Autowired
    private VacinaService vacinaService;

    @GetMapping
    public List<Vacina> getVacinasDisponiveis() {
        return vacinaService.getVacinasDisponiveis();
    }

    @GetMapping(value = "/{id}")
    public ResponseEntity<Vacina> findById(@PathVariable Long id){
        Vacina obj = vacinaService.findById(id);
        return ResponseEntity.ok().body(obj);
    }

    @PostMapping
    public Vacina criarVacina(@RequestBody Vacina vacina) {
        return vacinaService.salvarVacina(vacina);
    }

    @DeleteMapping(value = "/{id}")
    public ResponseEntity<Void> delete(@PathVariable Long id){
        vacinaService.delete(id);
        return ResponseEntity.noContent().build();
    }
    @PutMapping(value = "/{id}")
    public ResponseEntity<Vacina> update(@PathVariable Long id, @RequestBody Vacina obj){
        obj = vacinaService.update(id, obj);
        return ResponseEntity.ok().body(obj);
    }

}
