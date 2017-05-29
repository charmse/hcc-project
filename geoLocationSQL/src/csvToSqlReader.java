/**
 * Created by cale on 2/14/17.
 */

import java.io.File;
import java.io.FileNotFoundException;
import java.math.BigInteger;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.*;

public class csvToSqlReader {

    public static void main (String[] args) {

        ArrayList<Blocks> blocksList = new ArrayList<Blocks>();
        ArrayList<Location> locationList = new ArrayList<Location>();

        try{

            //Creating Blocks HashMap from csv file
            Scanner sc = new Scanner(new File ("data/GeoLiteCity-Blocks.csv"));
            String line;
            line = sc.nextLine();                   //Copyright line
            line = sc.nextLine();                   //Title line
            while(sc.hasNextLine()) {
                line = sc.nextLine();
                if(!line.trim().isEmpty()) {
                    String entry[] = line.trim().split(",");
                    String start[] = entry[0].trim().split("\"");
                    String end[] = entry[1].trim().split("\"");
                    String loc[] = entry[2].trim().split("\"");
                    Blocks b = new Blocks(Long.parseLong(start[1].trim()), Long.parseLong(end[1].trim()), Integer.parseInt(loc[1].trim()));
                    blocksList.add(b);

                }
            }
            sc.close();

            //Creating Location HashMap from csv file
            sc = new Scanner(new File ("data/GeoLiteCity-Location.csv"));
            line = sc.nextLine();                   //Copyright line
            line = sc.nextLine();                   //Title line
            while(sc.hasNextLine()) {
                line = sc.nextLine();
                //System.out.println(line);
                if(!line.trim().isEmpty()) {
                    String entry[] = line.trim().split(",");
                    Location l = new Location(Integer.parseInt(entry[0].trim()), Double.parseDouble(entry[5].trim()), Double.parseDouble(entry[6].trim()));
                    locationList.add(l);
                }
            }
            sc.close();

        }catch (FileNotFoundException e) {
            throw new RuntimeException(e);
        }

        System.out.println("IT WORKED! ...so far.");

        Connection conn = ConnectionFactory.getConnection();
        String query = null;
        PreparedStatement ps = null;
        ResultSet rs = null;

        try{
            /*
            query = "INSERT INTO Blocks (startIpNum, endIpNum, locId) VALUES (?, ?, ?)";
            ps = conn.prepareStatement(query);
            for (Blocks b : blocksList) {
                ps.setLong(1, b.getStartIpNum());
                ps.setLong(2, b.getEndIpNum());
                ps.setInt(3, b.getLocId());
                ps.execute();
            }
	        */
            query = "INSERT INTO Location (locId, latitude, longitude) VALUES (?, ?, ?)";
            ps = conn.prepareStatement(query);
            for (Location l : locationList) {
                ps.setInt(1, l.getLocId());
                ps.setDouble(2, l.getLatitude());
                ps.setDouble(3, l.getLongitude());
                ps.execute();
            }

        }catch (SQLException e) {
            System.err.println("Got a SQL exception!");
        }

        ConnectionFactory.closeConnection(conn, ps, rs);

        System.out.println("IT WORKS!");
    }
}
