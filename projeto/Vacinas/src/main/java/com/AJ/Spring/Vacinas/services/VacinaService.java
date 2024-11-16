package com.AJ.Spring.Vacinas.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.AJ.Spring.Vacinas.entities.Vacina;
import com.AJ.Spring.Vacinas.repositories.VacinaRepository;

@Service
public class VacinaService {

    @Autowired
    private VacinaRepository vacinaRepository;

    public List<Vacina> getVacinasDisponiveis() {
        return vacinaRepository.findAll();
    }

    public Vacina salvarVacina(Vacina vacina) {
        return vacinaRepository.save(vacina);
    }
}

