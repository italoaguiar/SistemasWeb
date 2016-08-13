/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.ufop.petshop.model;

import java.io.Serializable;

/**
 *
 * @author italo
 */
public class Cliente implements Serializable, InterfaceModel {
    
    private int id;
    private String nome;
    private String login;

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }
    private String senha;

    @Override
    public int getId() {
        return id;
    }
    
    public void setId(int id){
        this.id = id;
    }
    
    public void setNome(String nome){
        this.nome = nome;
    }

    @Override
    public String getNome() {
        return nome;
    }

    @Override
    public String getTable() {
        return "clientes";
    }
    
}
