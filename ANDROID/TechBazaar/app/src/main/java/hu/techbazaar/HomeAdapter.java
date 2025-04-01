package hu.techbazaar;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Filter;
import android.widget.Filterable;
import android.widget.ImageView;
import android.widget.RatingBar;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;

import java.util.ArrayList;

public class HomeAdapter extends RecyclerView.Adapter<HomeAdapter.VH> implements Filterable {
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

        if(holder.getAdapterPosition() > position){
            Animation ani = AnimationUtils.loadAnimation(con, R.anim.slide_left_to_right);
            holder.itemView.startAnimation(ani);
            position = holder.getAdapterPosition();
        }

    }

    @Override
    public int getItemCount() {
        return items.size();
    }

    @Override
    public Filter getFilter() {return web_shop_filter;}

    private Filter web_shop_filter = new Filter() {
        @Override
        protected FilterResults performFiltering(CharSequence constraint) {
            ArrayList<items> filter_list = new ArrayList<>();
            FilterResults results = new FilterResults();

            if(constraint == null || constraint.length() == 0){
                results.count = items.size();
                results.values = items;
            }
            else {
                String ch_pattern = constraint.toString().toLowerCase().trim();

                for(hu.techbazaar.items item : items){
                    if(item.getName().toLowerCase().contains(ch_pattern)){
                        filter_list.add(item);
                    }
                }

                results.count = filter_list.size();
                results.values = filter_list;
            }

            return results;
        }

        @Override
        protected void publishResults(CharSequence constraint, FilterResults results) {
            items = (ArrayList) results.values;
            notifyDataSetChanged();
        }
    };
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
            Glide.with(con).load(citem.getImgsrc()).into(img);

        }
    }
}
