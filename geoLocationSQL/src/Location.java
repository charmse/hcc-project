/**
 * Created by cale on 2/13/17.
 */
public class Location {

    private int locId;
    private double latitude;
    private double longitude;

    public Location(int locId, double latitude, double longitude) {
        this.locId = locId;
        this.latitude = latitude;
        this.longitude = longitude;
    }

    public int getLocId() {
        return locId;
    }

    public double getLatitude() {
        return latitude;
    }

    public double getLongitude() {
        return longitude;
    }
}
