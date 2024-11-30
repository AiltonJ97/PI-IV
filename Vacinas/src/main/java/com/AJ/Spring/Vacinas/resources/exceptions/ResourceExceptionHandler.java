package com.AJ.Spring.Vacinas.resources.exceptions;

import com.AJ.Spring.Vacinas.resources.exceptions.resources.exceptions.StandardError;
import com.AJ.Spring.Vacinas.services.exceptions.DatabaseException;
import jakarta.servlet.http.HttpServletRequest;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.ExceptionHandler;

import java.time.Instant;

public class ResourceExceptionHandler {
    @ExceptionHandler(ResourceNotFoundException.class)
    public ResponseEntity<StandardError> resourceNotFound(ResourceNotFoundException e,
                                                          HttpServletRequest request){
        String error = "Recurso não encontrado";
        HttpStatus status = HttpStatus.NOT_FOUND;
        StandardError err = new StandardError(Instant.now(), status.value(), error, e.getMessage(), request.getRequestURI());
        return ResponseEntity.status(status).body(err);
    }

    @ExceptionHandler(DatabaseException.class)
    public ResponseEntity<StandardError> dataBase(DatabaseException e,
                                                  HttpServletRequest request){
        String error = "Erro de Banco de Dados: Dados vinculados";
        HttpStatus status = HttpStatus.BAD_REQUEST;
        StandardError err = new StandardError(Instant.now(), status.value(), error, e.getMessage(), request.getRequestURI());
        return ResponseEntity.status(status).body(err);
    }
}
