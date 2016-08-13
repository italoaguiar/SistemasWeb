/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.ufop.petshop.bean;

import br.ufop.petshop.controller.ClienteController;
import br.ufop.petshop.model.InterfaceModel;
import java.util.List;
import javax.enterprise.context.RequestScoped;
import javax.faces.application.FacesMessage;
import javax.inject.Named;
import org.primefaces.event.RowEditEvent;

/**
 *
 * @author italo
 */
@Named(value = "clienteBean")
@RequestScoped
public class ClienteBean {
    
    public List<InterfaceModel> getClientes(){
        ClienteController cliente = new ClienteController();
        return cliente.getList();
    }
    
    public void onEdit(RowEditEvent event) {  
        ClienteController cliente = new ClienteController();
        cliente.update((InterfaceModel)event.getObject());
    }  
    
}
