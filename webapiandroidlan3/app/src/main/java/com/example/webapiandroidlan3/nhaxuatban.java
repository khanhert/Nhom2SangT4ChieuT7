package com.example.webapiandroidlan3;

import android.content.Context;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Spinner;

import java.util.List;

public class nhaxuatban {
    private int id;
    private String ten;
    private String mail;

    public nhaxuatban(int id, String ten, String mail) {
        this.id = id;
        this.ten = ten;
        this.mail = mail;
    }

    public nhaxuatban() {
    }

    @Override
    public String toString() {
        return ten;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTen() {
        return ten;
    }

    public void setTen(String ten) {
        this.ten = ten;
    }

    public String getMail() {
        return mail;
    }

    public void setMail(String mail) {
        this.mail = mail;
    }
}
