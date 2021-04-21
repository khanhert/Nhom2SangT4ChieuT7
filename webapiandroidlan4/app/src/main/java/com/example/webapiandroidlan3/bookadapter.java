package com.example.webapiandroidlan3;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;

import java.util.List;

public class bookadapter extends RecyclerView.Adapter<bookadapter.bookItemViewHolder> {
    private List<book> b;
    private Context context;

    public bookadapter(List<book> bo, Context context) {
        this.b = bo;
        this.context = context;
    }
    public int getItemCount()
    {
        return b.size();
    }

    @NonNull
    @Override
    public bookItemViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView= LayoutInflater.from(parent.getContext())
                .inflate(R.layout.items_book, parent,false);
        return new bookItemViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull bookItemViewHolder holder, int position) {
        book bk=b.get(position);
        Picasso.with(context)
                .load(bk.hinh)
                .into(holder.iimg);
        holder.tvname.setText(bk.ten_sach);
        holder.tvid.setText(String.valueOf(bk.id));
    }

    public static class bookItemViewHolder extends RecyclerView.ViewHolder {
        public TextView tvname;
        public TextView tvid;
        public ImageView iimg;

        public bookItemViewHolder(View itemView) {
            super(itemView);
            tvname = (TextView) itemView.findViewById(R.id.name);
            tvid = (TextView) itemView.findViewById(R.id.id);
            iimg = (ImageView) itemView.findViewById(R.id.img);
        }
    }
}
