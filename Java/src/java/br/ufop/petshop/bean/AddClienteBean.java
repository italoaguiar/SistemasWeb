/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.ufop.petshop.bean;

import br.ufop.petshop.controller.InterfaceController;
import br.ufop.petshop.dao.ClienteDAO;
import br.ufop.petshop.model.Cliente;
import br.ufop.petshop.model.InterfaceModel;
import java.awt.event.ActionEvent;
import java.util.List;
import javax.inject.Named;
import javax.enterprise.context.Dependent;

/**
 *
 * @author italo
 */
@Named(value = "addClienteBean")
@Dependent
public class AddClienteBean extends Cliente{

    /**
     * Creates a new instance of AddClienteBean
     */
    public AddClienteBean() {
    }
    
    public void add() {
        ClienteDAO clientes = new ClienteDAO();
        clientes.add(this);
    }

    
}
