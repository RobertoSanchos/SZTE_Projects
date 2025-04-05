package hu.techbazaar;

public class Category_items {
    private String category_name;
    private int category_img;

    public Category_items(String category_name, int category_img) {
        this.category_name = category_name;
        this.category_img = category_img;
    }

    public int getCategory_img() {
        return category_img;
    }

    public String getCategory_name() {
        return category_name;
    }
}
