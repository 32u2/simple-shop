<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                "name" => "Space Suit",
                "description" => "'Bad-ass' design as per Elon Musk's brief. Fitting any lockdown reveller, with pockets to spare.",
                "price" => "1500.00"],
            [
                "name" => "Intelligent Kitten",
                "description" => "Able to recognize 19 species of rodents and solve Prisoners Dilemma without use of calculator.",
                "price" => "2499.00"],
            [
                "name" => "Nostalgic Sunglasses",
                "description" => "Let no one blinds you with science. Good for any occasion. BYODM (Bring Your Own Doc Martens)",
                "price" => "600.00"],
            [
                "name" => "Anger Top-up: Medium",
                "description" => "Just pay, then open a ticket and we may tell you how it works.'",
                "price" => "10000.00"],
            [
                "name" => "Trivia Shop Special",
                "description" => "This lucky packet reveals how to plug in USB stick in less than three attempts.",
                "price" => "29.99"],
            [
                "name" => "Secret Capture Device",
                "description" => "No description.",
                "price" => "1.50"],
            [
                "name" => "Piece of String",
                "description" => "Sold in various lengths for the same price.",
                "price" => "1.50"],
            [
                "name" => "Mind Rest for iMac",
                "description" => "You will never again wonder where did it leave.",
                "price" => "15999.99"],
            [
                "name" => "Organic Wand - FREE",
                "description" => "That's right - just wave it and stick our green sticker over it.",
                "price" => "0.00"]
        ]);
    }
}

