import java.math.BigInteger;

/**
 */
public class Blocks {

    private long startIpNum;
    private long endIpNum;
    private int locId;

    public Blocks(long startIpNum, long endIpNum, int locId) {
        this.startIpNum = startIpNum;
        this.endIpNum = endIpNum;
        this.locId = locId;
    }

    public long getStartIpNum() {
        return startIpNum;
    }

    public long getEndIpNum() {
        return  endIpNum;
    }

    public int getLocId() {
        return locId;
    }
}
