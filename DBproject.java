
import java.io.IOException;
import java.sql.SQLException;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 *
 * @author adonis
 */
public class DBproject {
    
    //class intances 
    private DB_connector jdbc;
    private String username = "ejsanche";              // Change to your own username
    private String mysqlPassword = "21adonis94";    // Change to your own mysql Password
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws SQLException{
        
        
        // TODO code application logic here
       
        for (String arg : args) {
            System.out.println(arg+"\n");
        }
        
        DBproject obj = new DBproject();
        obj.menu(args);
        
    }
    
    public DBproject()throws SQLException{
        jdbc = new DB_connector();
        jdbc.connect(username, mysqlPassword);
    }
    
    public void menu(String [] args)throws SQLException{
        int op;
        op = Integer.parseInt(args[0]);
        switch(op){
            case 1:
                //called function 1
                func1Query(args);
                break;
            case 2:
                //Called function 2
                func2Query(args);
                break;
            case 3: 
                func3Query(args);
                break;
            default:
                    break;
        }
                
       
    }
    
    //Add a student to the Student table
    public void func1Query(String [] args)throws SQLException{
        String query = "INSERT INTO Student values('" + args[1] + "','" + args[2] + "','" + args[3] + "');";
        jdbc.update(query);
        System.out.println(query + "\n");
    }
    //Add a course to the Course table
     public void func2Query(String [] args)throws SQLException{
       
        String query = "INSERT INTO Course values('" + args[1] + "','" + args[2] + "','" + args[3] + "','" + args[4] +"');";
        jdbc.update(query);
        System.out.println(query + "\n");
        
    }
    //Add an application to the Enrollment table
    public void func3Query(String [] args)throws SQLException{
        
        String query = "INSERT INTO Enrollment values('" + args[1] + "','" + args[2] + "','" + args[3] + "');";
        jdbc.update(query);
        System.out.println(query + "\n");
        
    }
    
}

