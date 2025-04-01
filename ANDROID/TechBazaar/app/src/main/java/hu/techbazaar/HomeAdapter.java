package hu.techbazaar;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.RatingBar;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class HomeAdapter extends RecyclerView.Adapter<HomeAdapter.VH> {
    private ArrayList<items> items;
    private ArrayList<items> items_filter;
    private Context con;
    private int LP = -1;

    public HomeAdapter(Context con, ArrayList<items> items) {
        this.items = items;
        this.items_filter = items;
        this.con = con;
    }

    @Override
    public VH onCreateViewHolder(ViewGroup parent, int viewType) {
        return new VH(LayoutInflater.from(con)
                .inflate(R.layout.home_items, parent, false));
    }

    @Override
    public void onBindViewHolder(HomeAdapter.VH holder, int position) {
        items citem = items.get(position);

        holder.bindTo(citem);
    }

    @Override
    public int getItemCount() {
        return items.size();
    }

    class VH extends RecyclerView.ViewHolder{
        private TextView name, desc, price;
        private ImageView img;
        private RatingBar rate;

        public VH(View itemView) {
            super(itemView);

            name = itemView.findViewById(R.id.item_name);
            desc = itemView.findViewById(R.id.item_description);
            price = itemView.findViewById(R.id.item_price);
            img = itemView.findViewById(R.id.item_img);
            rate = itemView.findViewById(R.id.item_rate);

            itemView.findViewById(R.id.cart).setOnClickListener(new View.OnClickListener(){
                @Override
                public void onClick(View v) {

                }
            });
        }

        public void bindTo(hu.techbazaar.items citem) {
            name.setText(citem.getName());
            desc.setText(citem.getDesc());
            price.setText(citem.getPrice());
            rate.setRating(citem.getRate());


        }
    }
}
