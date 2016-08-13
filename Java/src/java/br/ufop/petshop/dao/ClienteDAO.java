/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.ufop.petshop.dao;

import br.ufop.petshop.model.Cliente;
import br.ufop.petshop.model.InterfaceModel;
import br.ufop.web.persistence.DataSource;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author italo
 */
public class ClienteDAO implements InterfaceDAO {

    @Override
    public List<InterfaceModel> getList() {

        List<InterfaceModel> clientes = new ArrayList<>();

        String sql = "SELECT * FROM clientes";
        ResultSet rs = DataSource.executeQuery(sql);


                        
        try {
            while (rs.next()) {
                Cliente cliente = new Cliente();
                cliente.setId(rs.getInt("id"));
                cliente.setNome(rs.getString("nome"));
                cliente.setLogin(rs.getString("login"));
                cliente.setSenha(rs.getString("senha"));
                clientes.add(cliente);
            }
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDAO.class.getName()).log(Level.SEVERE, null, ex);
        }

        return clientes;

    }

    @Override
    public boolean add(InterfaceModel item) {

        Cliente cliente = (Cliente) item;

        String sql = String.format("INSERT INTO clientes (`nome`,`login`,`senha`) VALUES('%s','%s','%s');",
                cliente.getNome(),cliente.getLogin(),cliente.getSenha());
        System.out.println(sql);

        return DataSource.executeUpdate(sql);
    }
    
    public boolean update(InterfaceModel item) {

        Cliente cliente = (Cliente) item;

        String sql = "UPDATE clientes SET `nome` ='" +
                cliente.getNome() + 
                "',`login` = '" +
                cliente.getLogin() + 
                "',`senha` = '" +
                cliente.getSenha() + "' WHERE `id` =" + cliente.getId() + ";";
        System.out.println(sql);

        return DataSource.executeUpdate(sql);
    }

    @Override
    public InterfaceModel get(int id) {

        String sql = "SELECT * FROM clientes WHERE id = " + id;
        ResultSet rs = DataSource.executeQuery(sql);
        Cliente cliente = new Cliente();

        try {
            if (rs.next()) {
                cliente.setId(rs.getInt("id"));
                cliente.setNome(rs.getString("nome"));
                cliente.setLogin(rs.getString("login"));
                cliente.setSenha(rs.getString("senha"));
            }
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDAO.class.getName()).log(Level.SEVERE, null, ex);
        }

        return (InterfaceModel) cliente;
        
    }

}

