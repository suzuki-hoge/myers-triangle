import myers.Checker;

import java.util.Arrays;

public class Main {
    // スペース区切りのコマンドライン引数が文字列配列で渡されて起動する
    public static void main(String[] args) {
        System.out.println(Checker.apply(Arrays.asList(args)));
    }
}
