package com.AJ.Spring.Vacinas.services;

import java.util.List;
import java.util.Optional;

import com.AJ.Spring.Vacinas.entities.PostoVacinacao;
import com.AJ.Spring.Vacinas.repositories.PostoVacinacaoRepository;
import com.AJ.Spring.Vacinas.resources.exceptions.ResourceNotFoundException;
import com.AJ.Spring.Vacinas.services.exceptions.DatabaseException;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataIntegrityViolationException;
import org.springframework.dao.EmptyResultDataAccessException;
import org.springframework.stereotype.Service;

@Service
public class PostoVacinacaoService {

    @Autowired
    private PostoVacinacaoRepository postoVacinacaoRepository;

    //Buscas Todos os Postos
    public List<PostoVacinacao> getTodosPostos() {
        return postoVacinacaoRepository.findAll();
    }

    //Buscar Postos por ID
    public PostoVacinacao findById(Long id) {
        Optional<PostoVacinacao> obj = postoVacinacaoRepository.findById(id);
        return obj.orElseThrow(() -> new ResourceNotFoundException(id));
    }

    //Adicionar Posto de Vacinação
    public PostoVacinacao salvarPosto(PostoVacinacao postoVacinacao) {
        return postoVacinacaoRepository.save(postoVacinacao);
    }

    ///Deletar Posto por ID
    public void delete(Long id) {
        try {
            postoVacinacaoRepository.deleteById(id);
        }
        catch (EmptyResultDataAccessException e) {
            throw new ResourceNotFoundException(id);
        } catch (DataIntegrityViolationException e) {
            throw new DatabaseException(e.getMessage());
        }
    }

    //Atualizar Posto de Vacinacao
    public PostoVacinacao update(Long id, PostoVacinacao obj) {
        PostoVacinacao entity = postoVacinacaoRepository.getReferenceById(id);
        updateDados(entity,obj);
        return postoVacinacaoRepository.save(entity);
    }
    private void updateDados(PostoVacinacao entity, PostoVacinacao obj) {
        entity.setNome(obj.getNome());
        entity.setEndereco(obj.getEndereco());
    }
}
