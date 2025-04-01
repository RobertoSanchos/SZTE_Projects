package hu.techbazaar;

public class items {
    private String name, desc, price;
    private int imgsrc;
    private float rate;

    public items(String name, String desc, String price, int imgsrc, float rate) {
        this.name = name;
        this.desc = desc;
        this.price = price;
        this.imgsrc = imgsrc;
        this.rate = rate;
    }

    public String getName() {return name;}
    public String getDesc() {return desc;}
    public String getPrice() {return price;}
    public float getRate() {return rate;}
    public int getImgsrc() {return imgsrc;}
}
