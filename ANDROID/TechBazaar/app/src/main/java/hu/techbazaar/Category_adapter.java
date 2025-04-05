package hu.techbazaar;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;

import java.util.List;

public class Category_adapter extends RecyclerView.Adapter<Category_adapter.ViewHolder> {

    private List<Category_items> categories;
    private Context context;
    //private OnCategoryClickListener listener;

   /* public interface OnCategoryClickListener {
        void onCategoryClick(Category_items category);
    }*/

    public Category_adapter(Context context, List<Category_items> categories) {
        this.context = context;
        this.categories = categories;
        //this.listener = listener;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(context).inflate(R.layout.category_item, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        Category_items category = categories.get(position);
        holder.text.setText(category.getCategory_name());
        Glide.with(context).load(category.getCategory_img()).into(holder.cimg);

        //holder.itemView.setOnClickListener(v -> listener.onCategoryClick(category));
    }

    @Override
    public int getItemCount() {return categories.size();}

    public static class ViewHolder extends RecyclerView.ViewHolder {
        TextView text;
        ImageView cimg;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            text = itemView.findViewById(R.id.categoryText);
            cimg = itemView.findViewById(R.id.category_images);
        }
    }
}