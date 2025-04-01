package hu.techbazaar;

public class items {
    private String type, name, desc;
    private int imgsrc, price;
    private float rate;

    public items(String desc, int imgsrc, String name, int price, float rate, String type) {
        this.desc = desc;
        this.imgsrc = imgsrc;
        this.name = name;
        this.price = price;
        this.rate = rate;
        this.type = type;
    }

    public String getType() {return type;}
    public String getName() {return name;}
    public String getDesc() {return desc;}
    public int getPrice() {return price;}
    public float getRate() {return rate;}
    public int getImgsrc() {return imgsrc;}
}
