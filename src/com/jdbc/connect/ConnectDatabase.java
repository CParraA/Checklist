package com.jdbc.connect;

import java.sql.Connection;
import java.sql.DriverManager;

public class ConnectDatabase {
	
	private static Connection connection = null;
	
	public static void main(String[] args) {
		
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			String dbURL = "jdbc:mysql://127.0.0.1:3306/proyecto";
			String username = "root";
			String password = "";
			connection = DriverManager.getConnection(dbURL, username, password);			
			System.out.println("Conexion Exitosa");
		} catch (Exception e) {
			throw new RuntimeException("Algo salio mal");
		}

	}

}
