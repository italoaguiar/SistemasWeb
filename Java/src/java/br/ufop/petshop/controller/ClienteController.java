/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.ufop.petshop.controller;

import br.ufop.petshop.dao.ClienteDAO;
import br.ufop.petshop.model.InterfaceModel;
import java.util.List;

/**
 *
 * @author italo
 */
public class ClienteController implements InterfaceController {

    @Override
    public List<InterfaceModel> getList() {
        ClienteDAO clientes = new ClienteDAO();
        return clientes.getList();
    }

    @Override
    public InterfaceModel get(int id) {
        ClienteDAO clientes = new ClienteDAO();
        return clientes.get(id);
    }

    @Override
    public boolean add(InterfaceModel item) {
        ClienteDAO clientes = new ClienteDAO();
        return clientes.add(item);
    }
    
    public boolean update(InterfaceModel item) {
        ClienteDAO clientes = new ClienteDAO();
        return clientes.update(item);
    }
    
}
