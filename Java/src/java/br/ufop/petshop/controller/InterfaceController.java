/*
 * 
 */
package br.ufop.petshop.controller;

import br.ufop.petshop.model.InterfaceModel;
import java.util.List;

/**
 *
 * @author Fernando B Oliveira <https://github.com/fboliveira>
 */
public interface InterfaceController {

    public List<InterfaceModel> getList();
    public InterfaceModel get(int id);
    public boolean add(InterfaceModel item);     
    
    
}
