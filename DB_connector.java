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


    // Execute an SQL query passed in as a String parameter
    // and print the resulting relation
    public void query(String q) throws SQLException {
        if (statement == null) {
            statement = connection.createStatement();
        }
        try {
            ResultSet resultSet = statement.executeQuery(q);
            System.out.println("\n---------------------------------");
            System.out.println(q+"\n");
           
            if (!resultSet.next()) {
                System.out.println("Does not exits");
            } else {
                resultSet.absolute(0); // move back the result set pointer 
                System.out.println("Query: \n" + q + "\n\nResult: ");
                print(resultSet);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public int query(String q, String [] input) throws SQLException {
        if (statement == null) {
            statement = connection.createStatement();
        }
        try {
            ResultSet resultSet = statement.executeQuery(q);
            System.out.println("\n--------------------------------------------\n");
           
            
            if (!resultSet.next()) {
                System.out.println("The " + input[1] + " does NOT exists\n");
                return -1;
            } else if ("getValue".equals(input[0])) { //this option will return the value of the query. Example restaurantNumber:
                String value = resultSet.getString(1);
                try {
                    return Integer.parseInt(value);
                } catch (NumberFormatException n) {
                    n.printStackTrace();
                    return -1;
                }
            } else {
                resultSet.absolute(0); // move back the result set pointer 
                System.out.println(input[1] + ":");
                print(resultSet);
                return 0;
            }

        } catch (SQLException e) {
            e.printStackTrace();
            return -2;
        }
    }

    // Print the results of a query with attribute names on the first line
    // Followed by the tuples, one per line
    public void print(ResultSet resultSet) throws SQLException {
        ResultSetMetaData metaData = resultSet.getMetaData();
        int numColumns = metaData.getColumnCount();
        
        printHeader(metaData, numColumns);
        printRecords(resultSet, numColumns);
    }

    // Print the attribute names
    public void printHeader(ResultSetMetaData metaData, int numColumns) throws SQLException {
        for (int i = 1; i <= numColumns; i++) {
            System.out.printf("%-25s", metaData.getColumnName(i));
        }
        System.out.println();
    }

    // Print the attribute values for all tuples in the result
    public void printRecords(ResultSet resultSet, int numColumns) throws SQLException {
        String columnValue;
        
       
        while (resultSet.next()) {
            for (int i = 1; i <= numColumns; i++) {

                columnValue = resultSet.getString(i);
                System.out.printf("%-25s", columnValue);
            }

            System.out.println("");
        }
        System.out.println();
    }

    // update the tables by doing insert into any table, any values from data passed in as String parameters. 
    //or perform deletes 
    public void update(String query) throws SQLException {
        if (statement == null) {
            statement = connection.createStatement();
        }
        try {
            statement.executeUpdate(query);
            System.out.println("Action done succesfully\n");
        } catch (SQLException e) {
            System.out.println("Cannot be updated");
            e.printStackTrace();
        }
    }
}

