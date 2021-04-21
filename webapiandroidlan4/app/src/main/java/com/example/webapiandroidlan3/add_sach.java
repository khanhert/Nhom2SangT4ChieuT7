package com.example.webapiandroidlan3;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Adapter;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

public class add_sach extends AppCompatActivity {
    Button btnadd;
    EditText edtid, edtten, edttacgia;
    Spinner spnhasx;
    ArrayAdapter<String> adapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_sach);
        btnadd=findViewById(R.id.btnadd);
        btnadd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(add_sach.this, "Thêm sách thành công !!!", Toast.LENGTH_LONG).show();
            }
        });
        spnhasx=findViewById(R.id.spnsx);
        nhaxuatban[] nxb=nhaxuatbandata.getnhaxuatban();
        ArrayAdapter<nhaxuatban> nhaxuatbanArrayAdapter=new ArrayAdapter<nhaxuatban>(this, R.layout.support_simple_spinner_dropdown_item, nxb);
        nhaxuatbanArrayAdapter.setDropDownViewResource(R.layout.support_simple_spinner_dropdown_item);
        this.spnhasx.setAdapter(nhaxuatbanArrayAdapter);
        this.spnhasx.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                onItemSelectedHandler(parent, view, position, id);
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });
    }

    private void onItemSelectedHandler(AdapterView<?> parent, View view, int position, long id) {
        Adapter adapter1=parent.getAdapter();
        nhaxuatban nhaxuatban= (com.example.webapiandroidlan3.nhaxuatban) adapter1.getItem(position);
        Toast.makeText(getApplicationContext(), "Bạn đã chọn " +nhaxuatban.getTen(), Toast.LENGTH_LONG).show();
    }
}