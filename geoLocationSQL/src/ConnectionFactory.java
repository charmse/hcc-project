/**
 * Created by cale on 2/14/17.
 */
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import org.apache.log4j.Logger;


public class ConnectionFactory {

    private static org.apache.log4j.Logger log = Logger.getLogger(ConnectionFactory.class);

    public static Connection getConnection() {
        try {
            Class.forName("com.mysql.jdbc.Driver").newInstance();
        } catch (InstantiationException e) {
            //System.out.println("InstantiationException: ");
            log.error("InstantiationException: ", e);
            e.printStackTrace();
            throw new RuntimeException(e);
        } catch (IllegalAccessException e) {
            //System.out.println("IllegalAccessException: ");
            log.error("IllegalAccessException: ", e);
            e.printStackTrace();
            throw new RuntimeException(e);
        } catch (ClassNotFoundException e) {
            //System.out.println("ClassNotFoundException: ");
            log.error("ClassNotFoundException: ", e);
            e.printStackTrace();
            throw new RuntimeException(e);
        }

        Connection conn = null;

        try {
            conn = DriverManager.getConnection("jdbc:mysql://cse.unl.edu/charms", "charms", "Go fuck yourself, SQL!");
        } catch (SQLException e) {
            //System.out.println("SQLException: ");
            log.error("SQLException: ", e);
            e.printStackTrace();
            throw new RuntimeException(e);
        }

        return conn;
    }

    public static void closeConnection(Connection c, PreparedStatement p, ResultSet r) {
        try {
            if(r != null && !r.isClosed())
                r.close();
            if(p != null && !p.isClosed())
                p.close();
            if(c != null && !c.isClosed())
                c.close();
        } catch (SQLException e) {
            //System.out.println("SQLException: ");
            log.error("SQLException: ", e);
            e.printStackTrace();
            throw new RuntimeException(e);
        }
    }
}
