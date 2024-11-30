package com.AJ.Spring.Vacinas.services;

import com.AJ.Spring.Vacinas.entities.Vacina;
import com.AJ.Spring.Vacinas.repositories.VacinaRepository;
import com.AJ.Spring.Vacinas.resources.exceptions.ResourceNotFoundException;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.EmptyResultDataAccessException;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class VacinaService {

    @Autowired
    private VacinaRepository vacinaRepository;

    public List<Vacina> getVacinasDisponiveis() {
        return vacinaRepository.findAll();
    }
    //Buscar Vacinas por ID
    public Vacina findById(Long id) {
        Optional<Vacina> obj = vacinaRepository.findById(id);
        return obj.orElseThrow(() -> new ResourceNotFoundException(id));
    }
    //Adicionar Vacinas
    public Vacina salvarVacina(Vacina vacina) {
        return vacinaRepository.save(vacina);
    }
    //Deletar Vacinas por ID
    public void delete(Long id) {
        try {
            vacinaRepository.deleteById(id);
        } catch (EmptyResultDataAccessException e) {
            throw new ResourceNotFoundException(id);
        }
    }

    //Atualizar Vacinas
    public Vacina update(Long id, Vacina obj) {
        Vacina entity = vacinaRepository.getReferenceById(id);
        updateDados(entity,obj);
        return vacinaRepository.save(entity);
    }
    private void updateDados(Vacina entity, Vacina obj) {
        entity.setNome(obj.getNome());
        entity.setDisponivel(obj.isDisponivel());
        entity.setDescricao(obj.getDescricao());
    }

}
