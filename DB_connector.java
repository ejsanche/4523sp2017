/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author adonis
 */


import java.io.IOException;
import java.sql.*;

public class DB_connector {
    
    private Connection connection;
    private Statement statement;
    
    public DB_connector() {
        connection = null;
        statement = null;
    }
    
     // Connect to the database
    public void connect(String Username, String mysqlPassword) throws SQLException {
        try {
            connection = DriverManager.getConnection("jdbc:mysql://localhost/" + Username + "?"
                    + "user=" + Username + "&password=" + mysqlPassword);
            //connection = DriverManager.getConnection("jdbc:mysql://localhost/" + Username +
            //       "?user=" + Username + "&password=" + mysqlPassword);
        } catch (Exception e) {

            System.out.println("ERROR: Unable to connect to the database with these credentials. \nExiting the program...");
            //System.exit(0);
            throw e;
        }
    }

    // Disconnect from the database
    public void disConnect() throws SQLException {
        if(connection != null)
            connection.close();
        if(statement !=  null)
            statement.close();
    }

    //This function return false (0) if the query provide any result which indicate that is not empty. 
    public int verifyQuery(String q) throws SQLException {
        if (statement == null) {
            statement = connection.createStatement();
        }
        try {
            ResultSet resultSet = statement.executeQuery(q);
            
           
            //if the primary key already exist it will return 0 otherwise will return 1
            if (!resultSet.next()) {

                return 1;
            }
            else{

                return 0;
            }

        } catch (SQLException e) {
            e.printStackTrace();
            return -2;
        }
    }
    

    // update the tables by doing insert into any table, any values from data passed in as String parameters. 
    //or perform deletes 
    public void update(String query) throws SQLException {
        if (statement == null) {
            statement = connection.createStatement();
        }
        try {
            statement.executeUpdate(query);
        } catch (SQLException e) {
            System.out.println("Cannot be updated because of sql error");
            e.printStackTrace();
        }
    }
}

